<!-- resources/views/components/footer.blade.php -->
<footer >
    <p>&copy; {{ date('Y') }} Videos App</p>
    <p>Fet per <a href="https://github.com/fheius1" target="_blank">Florian Heius</a></p>
</footer>

<style>
    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        font-size: 14px;
    }

    footer a {
        color: #007BFF;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }
</style>
