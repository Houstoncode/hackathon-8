import * as types from '../mutation-types'
import axios from 'axios'

export const state = {
    documentHTML: '' 
}

export const actions = {
    async getConvertToHTML ({ commit }) {
        const { data: { data: { html }} } = await axios.post('/api/convert')
        
        commit(types.SET_HTML, html)
      }, 
}

export const mutations = {
    [types.SET_HTML] (state, html) {
      state.documentHTML = html
    }, 
}