(function($) {
    $(document).ready(function() {
        $('[data-echelonso_animated_gradient="true"]').each(function(k,v) {
            $(v).append('<canvas class="gradient-canvas" id="'+$(v).data('echelonso_animated_gradient_id')+'"></canvas>')
            var gradient = $(v).data('echelonso_animated_gradient_data')
            var options = {}
            options = gradient
            options.element = '#'+ $(v).data('echelonso_animated_gradient_id')
            options.states = {
                "default-state": {
                    gradients: gradient.states.gradients,
                    transitionSpeed: gradient.speed
                }
            }
            options.image = {
                source: gradient.image,
                blendingMode: gradient.blending
            }
            var granimInstance = new Granim(options);
        });
    })
})(jQuery)
