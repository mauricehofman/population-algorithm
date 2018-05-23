<template>
    <div class="container">
        <div class="grid-content bg-purple" style="text-align:center;">
            <b>{{ type }}:</b> {{ amount }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['amount','type', 'production_per_hour'],
    }
</script>
