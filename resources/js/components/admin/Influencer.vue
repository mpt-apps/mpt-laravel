<template>

    <div :id="'influencer-'+data.id" class="admin-card">

        <div class="admin-card-header">
            <img :src="data.twitter_image_url" class="rounded-circle float-left">
            <h4>@<span v-text="data.twitter_screen_name"></span></h4>
        </div>

        <div class="admin-card-body">

            <h4 v-text="data.name"></h4>

            <div class="clearfix"></div>

            <p>
                <span v-text="data.twitter_followers_count"></span> Followers <br/>
                <span v-text="data.twitter_friends_count"></span> Follow <br/>
                <span v-text="data.twitter_statuses_count"></span> Twitts <br/>
            </p>

        </div>

    </div>

</template>

<script>
    export default {
        props: ['data']
    }
</script>
