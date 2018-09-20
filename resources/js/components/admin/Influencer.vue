<template>

    <div :id="'influencer-'+data.id" class="card">

        <div class="card-header">
            <h4>@<span v-text="data.twitter_screen_name"></span></h4>
        </div>

        <div class="card-body d-flex justify-content-between">

                <div class="p-2" style="background: #1d68a7;"><img :src="data.twitter_image_url" width="100" height="100px"></div>

                <div class="flex-fill p-2" style="background: #2fa360;">
                    <h4 v-text="data.name"></h4>
                    <h5>@<span v-text="data.twitter_screen_name"></span></h5>
                    <p v-text="data.twitter_description"></p>
                </div>

                <div class="p-2" style="background: #1d68a7;">
                    <div><span v-text="data.twitter_followers_count"></span> Followers</div>
                    <div><span v-text="data.twitter_friends_count"></span> Follow</div>
                    <div><span v-text="data.twitter_statuses_count"></span> Twitts</div>
                </div>

        </div>

    </div>

</template>

<script>
    export default {
        props: ['data']
    }
</script>
