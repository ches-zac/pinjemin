import './bootstrap';
import 'preline';


document.addEventListener('DOMContentLoaded', () => {
    const dropdownTriggers = document.querySelectorAll('[data-dropdown-trigger]');

    dropdownTriggers.forEach((trigger) => {
        const dropdownMenu = trigger.nextElementSibling;

        // Toggle dropdown visibility
        trigger.addEventListener('click', () => {
            const isOpen = dropdownMenu.classList.contains('hidden');
            dropdownMenu.classList.toggle('hidden', !isOpen);
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', (event) => {
            if (!trigger.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
});
