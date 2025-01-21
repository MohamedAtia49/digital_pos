$('document').ready(function(){

        // Handle mouseenter (hover) event with no delay
        $('.cat-title').on('mouseenter', function () {
            var $this = $(this);
            setTimeout(function () {
                $this.find('.btn-link').addClass('btn-cat-name');
            }, 0); // 0 ms delay for immediate effect
        });

        // Handle mouseleave event with no delay
        $('.cat-title').on('mouseleave', function () {
            var $this = $(this);
            setTimeout(function () {
                // Only remove the hover effect if the .cat-title is not active
                if (!$this.hasClass('active')) {
                    $this.find('.btn-link').removeClass('btn-cat-name');
                }
            }, 0); // 0 ms delay for immediate effect
        });

        // Handle click event with no delay
        $('.cat-title').on('click', function () {
            var $this = $(this);
            setTimeout(function () {
                // Toggle the 'active' class for the clicked .cat-title
                $this.toggleClass('active');

                // Toggle the .btn-cat-name class for the button text
                var btnLink = $this.find('.btn-link');
                if ($this.hasClass('active')) {
                    btnLink.addClass('btn-cat-name');
                } else {
                    btnLink.removeClass('btn-cat-name');
                }
            }, 0); // 0 ms delay for immediate effect
        });

        // Handle double-click event with no delay to prevent failure
        $('.cat-title').on('dblclick', function () {
            var $this = $(this);
            setTimeout(function () {
                // Toggle the 'active' class for the double-clicked .cat-title
                $this.toggleClass('active');

                // Ensure that .btn-cat-name is correctly added or removed
                var btnLink = $this.find('.btn-link');
                if ($this.hasClass('active')) {
                    btnLink.addClass('btn-cat-name');
                } else {
                    btnLink.removeClass('btn-cat-name');
                }
            }, 0); // 0 ms delay for immediate effect
        });
});
