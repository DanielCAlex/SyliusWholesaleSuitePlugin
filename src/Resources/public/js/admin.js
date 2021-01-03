$(document).ready(function () {

    let rulesetScopeValues = [
        'ruleset_scope_global',
        'ruleset_scope_product_taxonomy',
        'ruleset_scope_product',
        'ruleset_scope_product_variant',
    ];
    let rulesetScopeSelectText = $('#wholesale_ruleset_create_scope :selected').text();
    //Ruleset scope notifications.
    determineScopeInfoMessage();
    $('#wholesale_ruleset_create_scope').change(determineScopeInfoMessage);


    function changeScopeWarningText(desiredText) {
        $('#scope-info').text(
            desiredText
        );
    }

    function determineScopeInfoMessage() {
        switch ($('#wholesale_ruleset_create_scope').val()) {
            case rulesetScopeValues[0]:
                changeScopeWarningText(
                    rulesetScopeSelectText +
                    ': This ruleset will apply to ALL products.'
                )
                break;
            default:
                changeScopeWarningText(
                    'TODO'
                );
        }
    }
});
