const passwordInput = document.querySelector('.pas');
const toggleIcon = document.querySelector('.show-hide');

toggleIcon.addEventListener('click', () => {
    // Toggle password visibility
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';

    // Change icon
    toggleIcon.setAttribute('name', isPassword ? 'eye-off-outline' : 'eye-outline');
});
