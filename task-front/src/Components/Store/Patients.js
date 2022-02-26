import { createSlice } from '@reduxjs/toolkit';

const initialState = [];

export const patientsSlice = createSlice({
    name: 'patients',
    initialState: { values: initialState, onepatient: {} },
    reducers: {
        setPatientdata: (state, action) => {
            state.values = action.payload
        },
        setOnepatient: (state, action) => {
            state.onepatient = action.payload
        }
    }
});

export const { setPatientdata, setOnepatient } = patientsSlice.actions;
export default patientsSlice.reducer;