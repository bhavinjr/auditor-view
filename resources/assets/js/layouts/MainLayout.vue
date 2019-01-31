<template>
    <div class="container-fluid">
        <div id="mainHeader" class="pt-4 pb-4">
            <div class="row">
                <div class="col">
                    <img src="/vendor/viewdit/img/horizon.png">
                    <strong>Auditor</strong> <span>View</span>
                </div>
            </div>
        </div>

        <main class="mt-4 mb-4">
            <div class="row">
                <div class="col-md-1">
                    <main-sidebar/>
                </div>

                <div class="col-md-11">
                    <slot/>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    import MainSidebar from './MainSidebar.vue'

    export default {
        components: {
            MainSidebar,
        }
    }
</script>