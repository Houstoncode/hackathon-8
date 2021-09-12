import * as types from "../mutation-types";
import axios from "axios";

export const state = {
  documentHTML: "",
  documentCode: ""
};

export const actions = {
  async getConvertToHTML({ commit }) {
    const {
      data: {
        data: { html, code }
      }
    } = await axios.post("/api/convert");

    commit(types.SET_CODE, code)
    commit(types.SET_HTML, html);
  },
  async getDocument({ commit }, code) {
    const {
      data: {
        data: { html }
      }
    } = await axios.get(`/api/files/find/${code}`);

    commit(types.SET_HTML, html);
  },
  async getAllDocuments({ commit, state }) {
    return this.state.auth.user.files;
  }
};

export const mutations = {
  [types.SET_HTML](state, html) {
    state.documentHTML = html;
  },
  [types.SET_CODE](state, code) {
    state.documentCode = code;
  }
};
