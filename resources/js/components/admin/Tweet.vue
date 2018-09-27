<template>
    <div :id="'influencer-'+data.id" class="card">

        <div class="card-header d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight"><h4><span v-text="data.user.name"></span></h4></div>
            <div class="p-2 bd-highlight" v-text="ago" >Flex item</div>
        </div>

        <div class="card-body d-flex justify-content-between">
            <div v-text="data.full_text"></div>
        </div>

    </div>
</template>

<script>

    import moment from 'moment';

    export default {
        props: ['data'],

        computed: {
            ago() {
                return moment(this.data.created_at, "ddd MMM DD HH:mm:ss Z YYYY", 'EN').fromNow();
            }
        }
    }
</script>