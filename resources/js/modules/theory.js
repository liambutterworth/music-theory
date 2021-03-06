//
// Theory
//
// :: State
// :: Getters
// :: Mutations
// :: Actions
// :: Export

//
// State
//

const state = {
    theory: {
        chord: {
            ids: [],
            data: {},
        },

        interval: {
            ids: [],
            data: {},
        },

        note: {
            ids: [],
            data: {},
        },

        scale: {
            ids: [],
            data: {},
        },
    },
};

//
// Getters
//

const getters = {
    //
};

//
// Mutations
//

const mutations = {
    //
};

//
// Actions
//

const actions = {
    fetchNotes() {
        console.log('fetch notes');
    },
};

//
// Export
//

export default {
    state,
    getters,
    mutations,
    actions,
}
