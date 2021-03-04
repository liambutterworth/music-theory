<template>
    <app-container>
        <h1>Music Theory</h1>
    </app-container>
</template>

<script>

import AppContainer from 'components/App/Container';

export default {
    name: 'home',

    components: {
        AppContainer
    },

    mounted() {
        this.$api.get('chords').then(response => {
            console.log(response);
        });
    },
};

</script>
