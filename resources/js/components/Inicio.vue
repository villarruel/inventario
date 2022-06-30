<template>
    <nav class="navbar navbar-expand-lg navbar-danger bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/2367px-Vue.js_Logo_2.svg.png" alt="Logo vueJS" width="30" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <router-link exact-active-class="active" to="/" class="nav-link active text-white" aria-current="page">Inicio</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link exact-active-class="active" to="/productos" class="nav-link text-white" aria-current="page">Inventario</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link exact-active-class="active" to="/contacto" class="nav-link text-white" aria-current="page">Contacto</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <router-view></router-view>
</template>