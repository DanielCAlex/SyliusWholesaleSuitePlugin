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
use Symfony\Component\DependencyInjection\Container;
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
    /**
     * @var Container
     */
    protected $container;

    public function __construct(
        EntityManagerInterface $entityManager,
        TruncateContext $truncateContext,
        Session $session,
        RouterInterface $router,
        Container $container
    ) {
        $this->entityManager = $entityManager;
        self::$truncateContext = $truncateContext;
        $this->session = $session;
        $this->router = $router;
        $this->container = $container;
    }

    /**
     * @BeforeScenario
     * Truncate the table beforehand so we don't get unique constraint errors
     */
    public static function truncate()
    {
        echo 'Truncating tables.';
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
        $factory = $this->container->get('skyboundtech.factory.wholesale_ruleset');
        $manager = $this->container->get('skyboundtech.manager.wholesale_ruleset');
        foreach ($table as $node) {

            /** @var WholesaleRuleset $product */
            $ruleset = $factory->createNew();

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

            $manager->persist($ruleset);
        }
        $manager->flush();

        $repository = $this->container->get('skyboundtech.repository.wholesale_ruleset');

        $rulesets = $repository->findAll();

        if (count($rulesets) !== 4 || $rulesets === null) {
            throw new Exception('The required rulesets were not created.');
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
