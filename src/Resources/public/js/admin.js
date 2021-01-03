$(document).ready(function () {
    let rulesetScopeValues = [
        'ruleset_scope_global',
        'ruleset_scope_product_taxonomy',
        'ruleset_scope_product',
        'ruleset_scope_product_variant',
    ]
    //Ruleset scope notifications.
    determineScopeMessage();
    $('#wholesale_ruleset_create_scope').change(determineScopeMessage);

    function changeScopeWarningText(desiredText) {
        $('#scope-warning').text(
            desiredText
        );
    }

    function determineScopeMessage() {
        switch ($('#wholesale_ruleset_create_scope').val()) {
            case rulesetScopeValues[0]:
                changeScopeWarningText(
                    'This ruleset will apply to all products.'
                )
                break;
            default:
                changeScopeWarningText(
                    'TODO'
                );
        }
    }
});
