<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container text-center">
        <p class="mb-0">&copy; {{ date('Y') }} MyShop. All rights reserved.</p>
        <div class="mt-1">
            <a href="#" class="text-white mx-2">Privacy Policy</a> |
            <a href="#" class="text-white mx-2">Terms of Service</a> |
            <a href="#" class="text-white mx-2">Contact</a>
        </div>
    </div>
</footer>

<style>
/* Make footer sticky at bottom */
html, body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
}

.footer {
    margin-top: auto;
}
</style>
