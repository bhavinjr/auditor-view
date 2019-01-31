<template>
    <aside id="mainSidebar">
        <ul class="nav flex-column">
            <router-link tag="li" to="/dashboard" active-class="active" class="nav-item">
                <a class="nav-link">
                    <i>
                        <svg>
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xlink:href="#zondicon-dashboard"></use>
                        </svg>
                    </i>
                    Dashboard
                </a>
            </router-link>
        </ul>
    </aside>
</template>
