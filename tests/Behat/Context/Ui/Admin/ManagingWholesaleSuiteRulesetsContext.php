<?php
/*
 * This file was created by a developer at SkyBound Tech.
 * @author Daniel Alexandre <daniel.alexandre@skyboundtech.co>
 *
 * (c) SkyBound Tech
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Context\Ui\Admin;

use Exception;
use Behat\Mink\Session;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManagerInterface;
use Behat\MinkExtension\Context\MinkContext;
use Symfony\Component\Routing\RouterInterface;
use SkyBoundTech\SyliusWholesaleSuitePlugin\Entity\WholesaleRuleset;
use Tests\SkyBoundTech\SyliusWholesaleSuitePlugin\Behat\Context\Hooks\TruncateContext;

final class ManagingWholesaleSuiteRulesetsContext extends MinkContext
{

    /**
     * @var TruncateContext
     */
    static $truncateContext;
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    /**
     * @var Session
     */
    protected $session;
    /**
     * @var RouterInterface
     */
    protected $router;

    public function __construct(
        EntityManagerInterface $entityManager,
        TruncateContext $truncateContext,
        Session $session,
        RouterInterface $router
    ) {
        $this->entityManager = $entityManager;
        self::$truncateContext = $truncateContext;
        $this->session = $session;
        $this->router = $router;
    }

    /**
     * @BeforeSuite
     * Truncate the table beforehand so we don't get unique constraint errors
     */
    public static function truncate()
    {
        $tablesToTruncate = [
            0 => new WholesaleRuleset(),
        ];
        self::$truncateContext->truncateTables($tablesToTruncate);
    }

    /**
     * @Given the following wholesale rulesets exist
     */
    public function theFollowingWholesaleRulesetsExist(TableNode $table): void
    {
        foreach ($table as $node) {
            $ruleset = new WholesaleRuleset();

            /** @var string $name */
            $name = $node['name'];

            /** @var string $type */
            $type = $node['type'];

            /** @var string $scope */
            $scope = $node['scope'];

            /** @var string $description */
            $description = $node['description'];

            /** @var boolean $isEnabled */
            $isEnabled = filter_var($node['isEnabled'], FILTER_VALIDATE_BOOLEAN);

            $ruleset->setName($name);
            $ruleset->setType($type);
            $ruleset->setScope($scope);
            $ruleset->setDescription($description);
            $ruleset->setIsEnabled($isEnabled);

            $this->entityManager->persist($ruleset);
        }
        $this->entityManager->flush();

        $rulesets = $this->entityManager
            ->getRepository(WholesaleRuleset::class)
            ->findAll()
        ;

        if (count($rulesets) !== 4 || $rulesets === null) {
            throw new Exception('The rulesets were not created.');
        }
    }

    /**
     * @When I visit the page :route
     */
    public function iVisitThePage($route)
    {
        $url = $this->router->generate(
            $route,
        );

        $this->visit($url);

        $currentUrl = $this->session->getCurrentUrl();
//        $currentUrl = 'hmm';
        $message = sprintf(
            'Expected url: %s. Currently on page %s.',
            $url,
            $currentUrl
        );
        if (!str_contains($currentUrl, $url)) {
            throw new \Exception($message);
        }
    }
}
