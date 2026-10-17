define(['jquery'], function($) {
    return {
        init: function(params) {
            // Vérification basique
            console.log('thirdformloader init', params);

            // Exemple : si lecture seule, griser les champs de formulaire
            if (!params.canedit) {
                $('form').find('input, select, textarea, button').prop('disabled', true);
            }

            // autre logique spécifique...
        }
    };
});
