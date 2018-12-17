<template>
        <div class="container">
            <div class="d-flex flex-row">
                <div class="flex-fill p-2">
                    <span v-text="dataSet.total"></span> Influencers
                </div>
                <div class="p-2">
                    <a class="btn btn-success" href="/admin/influencers/create" role="button">
                        <span class="fas fa-plus"></span>
                    </a>
                </div>
            </div>
            <div class="row admin-influencers-list">
                <influencer v-for="(influencer, index) in items"
                            :key="influencer.id"
                            :data="influencer"
                            @deleted="remove(index)">
                </influencer>
            </div>
            <paginator :dataSet="dataSet" @changed="fetch"></paginator>
        </div>
</template>

<script>
    import Influencer from './Influencer.vue';
    import collection from '../../mixins/collection';

    export default {

        components: { Influencer },

        mixins: [collection],

        data() {
            return {
                dataSet: false
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },

            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);
                    page = query ? query[1] : 1;
                }
                return `${location.pathname}/list?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;
            }
        }

    }
</script>
