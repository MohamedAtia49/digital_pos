    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<<<<<<< HEAD
=======
    <script src="{{ asset('manager_dashboard/assets/') }}/vendor/libs/jquery/jquery.js"></script>
>>>>>>> 5dac875f776f9454fca7f985b467d23842f685f5
    <script src="{{ asset('manager_dashboard/assets/') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('manager_dashboard/assets/') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('manager_dashboard/assets/') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('manager_dashboard/assets/') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('manager_dashboard/assets/') }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('manager_dashboard/assets/') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('manager_dashboard/assets/') }}/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

<<<<<<< HEAD
    @stack('custom-select2')
    
    <script>

=======
    <script>

        // Preloader
        document.addEventListener("DOMContentLoaded", function () {
                const preloader = document.querySelector(".preloader");

                window.addEventListener("load", function () {
                    // Add a delay before hiding the preloader (e.g., 2 seconds)
                    setTimeout(() => {
                    preloader.classList.add("hidden");
                    }, 1500); // 2000ms = 2 seconds
                });
            });

            
>>>>>>> 5dac875f776f9454fca7f985b467d23842f685f5
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('morph.updated', (el, component) => {
                const createdAlert = document.querySelector('.create-alert');
                if (createdAlert){
                    setTimeout(() => {
                        createdAlert.style.display = 'none' ;
                    }, 2000);
                }
            });
        })

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('morph.updated', (el, component) => {
                const updatedAlert = document.querySelector('.update-alert');
                if (updatedAlert){
                    setTimeout(() => {
                        updatedAlert.style.display = 'none' ;
                    }, 2000);
                }
            });
        })

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('morph.updated', (el, component) => {
                const deletedAlert = document.querySelector('.delete-alert');
                if (deletedAlert){
                    setTimeout(() => {
                        deletedAlert.style.display = 'none' ;
                    }, 2000);
                }
            });
        })

<<<<<<< HEAD
=======

>>>>>>> 5dac875f776f9454fca7f985b467d23842f685f5
        document.addEventListener('createModalToggle', event => {
            $('#createModal').modal('toggle');
        })

        document.addEventListener('editModalToggle', event => {
            $('#editModal').modal('toggle');
        })

        document.addEventListener('deleteModalToggle', event => {
            $('#deleteModal').modal('toggle');
        })

        document.addEventListener('showModalToggle', event => {
            $('#showModal').modal('toggle');
        })

<<<<<<< HEAD
        ////////////////////////// New /////////////////////////
            // Preloader
            document.addEventListener("DOMContentLoaded", function () {
                const preloader = document.querySelector(".preloader");

                window.addEventListener("load", function () {
                    // Add a delay before hiding the preloader (e.g., 2 seconds)
                    setTimeout(() => {
                    preloader.classList.add("hidden");
                    }, 1500); // 2000ms = 2 seconds
                });
            });

            $('.full-screen').click(function () {
                // Request full screen for the whole page
                if (!document.fullscreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                    document.documentElement.requestFullscreen();
                    $(this).find('i').removeClass('bx-fullscreen').addClass('bx-exit-fullscreen');
                }else{
                    document.exitFullscreen();
                    $(this).find('i').removeClass('bx-exit-fullscreen').addClass('bx-fullscreen');
                }

            });

    </script>

    @stack('scripts')
=======
    </script>
>>>>>>> 5dac875f776f9454fca7f985b467d23842f685f5
