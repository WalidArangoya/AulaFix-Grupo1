<header>
    <nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="nav-item" id="logo">
                <a class="navbar-brand active"  href="index.php">LOGO</a>
            </div>
            <div class="nav-item flex-grow-1 mx-3" style="max-width: 900px;">
                <form class="hstack gap-2">
                    <input class="form-control" placeholder="Search"/>
                    <button class="btn-solid theme-secondary" type="submit"><img src="img/lupa.png" id="lupa"></button>
                    <button class="form-control combobox-toggle" type="button"
                        data-bs-toggle="combobox"
                        data-bs-name="country"
                        data-bs-placeholder="Gravedad"
                        id="filtro"
                        style="max-width: 120px">
                        <span class="combobox-value">Gravedad</span>
                        <svg class="combobox-caret" width="13" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.46967 5.46967C0.762563 5.17678 1.23744 5.17678 1.53033 5.46967L5 8.93934L8.46967 5.46967C8.76256 5.17678 9.23744 5.17678 9.53033 5.46967C9.82322 5.76256 9.82322 6.23744 9.53033 6.53033L5.53033 10.5303C5.23744 10.8232 4.76256 10.8232 4.46967 10.5303L0.46967 6.53033C0.176777 6.23744 0.176777 5.76256 0.46967 5.46967Z" fill="currentcolor"/></svg>
                    </button>
                    <div class="menu" id="gradoIncidencia">
                        <button class="menu-item" type="button" value="Baja">Baja</button>
                        <button class="menu-item" type="button" value="Media">Media</button>
                        <button class="menu-item" type="button" value="Alta">Alta</button>
                    </div>  
                </form>
            </div>
        
            <div class="nav-item" id="login">
                <a class="nav-link active" href="login.php">Iniciar Sesion</a>
            </div>
        </div>
    </nav>
</header>