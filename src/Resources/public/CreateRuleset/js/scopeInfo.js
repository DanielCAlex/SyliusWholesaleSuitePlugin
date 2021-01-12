$(document).ready(function () {

    let rulesetScopeValues = [
        'Global',
        'Product Taxonomy',
        'Product',
        'Product Variant',
    ];
    //Ruleset scope notifications.
    determineScopeInfoMessage();
    $('#wholesale_ruleset_create_scope').change(determineScopeInfoMessage);


    function changeScopeWarningText(desiredText) {
        $('#scope-info').text(
            desiredText
        );
    }

    function determineScopeInfoMessage() {
        let rulesetScopeSelectText = $('#wholesale_ruleset_create_scope :selected').text();
        switch ($('#wholesale_ruleset_create_scope').val()) {
            case rulesetScopeValues[0]:
                changeScopeWarningText(
                    rulesetScopeSelectText +
                    ': This ruleset will apply to ALL products.'
                )
                break;
            case rulesetScopeValues[1]:
                changeScopeWarningText(
                    rulesetScopeSelectText +
                    ': This ruleset will apply to products under the chosen taxonomies.'
                )
                break;
            case rulesetScopeValues[2]:
                changeScopeWarningText(
                    rulesetScopeSelectText +
                    ': This ruleset will apply to the chosen products.'
                )
                break;

            default:
                changeScopeWarningText(
                    'This ruleset will apply to the chosen product variants.'
                );
        }
    }
});
