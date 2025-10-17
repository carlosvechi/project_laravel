<template>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a href="" class="navbar-brand">
                <img src="../the/freeline.png" alt="" style="width:60px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Workspace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Recent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Starred</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Templates</a>
                    </li>
                </ul>
                <div class="d-flex me-auto">
                    <button class="btn btn-primary mx-5" @click="abrirModal" data-bs-toggle="modal" data-bs-target="#myModal"
                        type="button">✚
                        Create</button>
                </div>

                <form class="d-flex">
                    <input class="form-control" type="text" placeholder="Search">
                </form>
                <a href="">
                    <span class="material-symbols-outlined">
                        notifications
                    </span>
                    <span class="material-symbols-outlined">
                        help
                    </span>
                    <span class="material-symbols-outlined">
                        account_circle
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-sm color-nav">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <span class="nav-item ">
                        <a class="nav-link text-light">Development Sprint Board</a>
                    </span>
                    <span class="material-symbols-outlined nav-item m-2 text-light ps-5">
                        table_rows_narrow
                    </span>
                    <span class="nav-item">
                        <a class="nav-link text-light ps-0">Board</a>
                    </span>
                </ul>


                <div class="d-flex">
                    <div class="p-2 style=">
                        <span class="material-symbols-outlined text-light">
                            account_circle
                        </span>
                    </div>
                    <div class="p-2">
                        <span class="material-symbols-outlined text-light">
                            account_circle
                        </span>
                    </div>
                    <div class="p-2">
                        <span class="material-symbols-outlined text-light">
                            account_circle
                        </span>
                    </div>
                    <button class="btn btn-primary" type="button">Share</button>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>


export default {
    data() {
        return {

        }
    },
    methods: {
       
    }
}


</script>

<style>
.color-nav {
    background-color: #0C1E3EE5;
}
</style>