let rulesetScopeSelector = $('#wholesale_ruleset_create_scope');

let rulesetTaxonSelectorContainer = $('#ruleset-taxons');
let rulesetTaxonSelector = $('#wholesale_ruleset_create_rulesetTaxons');

determineTaxonSelectorVisibility();
rulesetScopeSelector.change(determineTaxonSelectorVisibility);

function determineTaxonSelectorVisibility() {
    if (rulesetScopeSelector.val() === "Product Taxonomy") {
        rulesetTaxonSelectorContainer.css('display', 'block');
        rulesetTaxonSelector.prop('disabled', false);
    } else {
        rulesetTaxonSelectorContainer.css('display', 'none');
        rulesetTaxonSelector.prop('disabled', true);
    }
}
