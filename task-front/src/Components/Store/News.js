import { createSlice } from '@reduxjs/toolkit';

const initialState = [];

export const newsSlice = createSlice({
    name: 'news',
    initialState: { values: initialState },
    reducers: {
        setNewsdata: (state, action) => {
            state.values = action.payload
        }
    }
});

export const { setNewsdata } = newsSlice.actions;
export default newsSlice.reducer;