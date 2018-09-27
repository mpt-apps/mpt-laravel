<template>
    <div>
        <div class="container">
            <div v-for="(tweet, index) in items" :key="tweet.id">
                <tweet :data="tweet._source" @deleted="remove(index)"></tweet>
            </div>
        </div>

    </div>
</template>

<script>

    import Tweet from './Tweet';
    import collection from '../../mixins/collection';

    export default {

        components: { Tweet },

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
                this.items = data;
            }
        }

    }
</script>