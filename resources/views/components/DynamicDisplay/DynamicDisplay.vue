<template>

<div class="DynamicDisplay {{ modifiers }}" style="
        background-image: linear-gradient(
            rgba(0, 0, 0, 0.75),
            rgba(0, 0, 0, 0.75)
        ),
    url({{ variables.image }});"
>

    <div class="DynamicDisplay__title">
        {{ variables.title }}
    </div>

</div>

</template>

<script>

    export default {

        props: ['variables', 'modifiers'],

        data() {
            return {};
        },

        ready() {
            this.variables = JSON.parse(decodeURIComponent(this.variables))
        }

    }

</script>