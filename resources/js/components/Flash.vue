<template>
    <div class="alert alert-flash" v-bind:class="{ 'alert-danger': hasError, 'alert-success': !hasError }" role="alert" v-show="show">
        <strong v-if="hasError">Error!</strong><strong v-else>Success!</strong> {{ body }}
    </div>
</template>

<script>
    export default {
        props: ['message'],
        error: ['error'],

        data() {
            return {
                body: '',
                show: false,
                hasError: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on(
                'flash', message => this.flash(message)
            );
        },

        methods: {
            flash(message, error) {
                error = (error !== undefined) ? error : true;
                this.body = message;
                if ( message.indexOf("Error") >= 0 ) {
                    this.hasError = true;
                }
                this.show = true;
                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    };
</script>

<style>
    .alert-flash {
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>
