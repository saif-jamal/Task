import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import { BrowserRouter } from 'react-router-dom';
import { configureStore } from '@reduxjs/toolkit';
import { Provider } from 'react-redux';
import patientsReducer from './Components/Store/Patients';
import newsReducer from './Components/Store/News';



const store = configureStore({
    reducer: {
        patients: patientsReducer,
        news: newsReducer
    }
});

ReactDOM.render(
    <BrowserRouter>
        <Provider store={store}>
            <App />
        </Provider>
    </BrowserRouter>
    , document.getElementById('root'));

