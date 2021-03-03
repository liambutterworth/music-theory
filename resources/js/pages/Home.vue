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
        console.log('mounted');
    },
};

</script>
