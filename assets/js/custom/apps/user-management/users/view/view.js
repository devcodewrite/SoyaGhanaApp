"use strict";

// Class definition
var KTUsersViewMain = function () {

    // Init sign out single user
    var initSignOutUser = () => {
        const signOutButtons = document.querySelectorAll('[data-kt-users-sign-out="single_user"]');

        signOutButtons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault();

                const deviceName = button.closest('tr').querySelectorAll('td')[1].innerText;

                Swal.fire({
                    text: "Are you sure you would like sign out " + deviceName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, sign out!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "You have signed out " + deviceName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        }).then(function(){
                            button.closest('tr').remove();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: deviceName + "'s session is still preserved!.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            }
                        });
                    }
                });
            });
        });


    }

    return {
        // Public functions
        init: function () {
            initSignOutUser();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersViewMain.init();
});