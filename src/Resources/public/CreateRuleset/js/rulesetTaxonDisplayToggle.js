let rulesetScopeSelector = $('#wholesale_ruleset_create_scope');

let rulesetTaxonSelectorContainer = $('#ruleset-taxons');
let rulesetProductSelectorContainer = $('#ruleset-products');
let rulesetProducVarianttSelectorContainer = $('#ruleset-product-variants');

let rulesetTaxonSelector = $('#wholesale_ruleset_create_rulesetTaxons');

determineSelectorVisibility();
rulesetScopeSelector.change(determineSelectorVisibility);

function determineSelectorVisibility() {
    if (rulesetScopeSelector.val() === "Product Taxonomy") {
        rulesetTaxonSelectorContainer.css('display', 'block');
        rulesetTaxonSelector.prop('disabled', false);
    } else {
        rulesetTaxonSelectorContainer.css('display', 'none');
        rulesetTaxonSelector.prop('disabled', true);
    }

    if (rulesetScopeSelector.val() === "Product") {
        rulesetProductSelectorContainer.css('display', 'block');
    } else {
        rulesetProductSelectorContainer.css('display', 'none');
    }

    if (rulesetScopeSelector.val() === "Product Variant") {
        rulesetProducVarianttSelectorContainer.css('display', 'block');
    } else {
        rulesetProducVarianttSelectorContainer.css('display', 'none');
    }

}
