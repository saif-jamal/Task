import React, { useEffect, useState, Suspense, lazy } from 'react';
import './App.css';
import Footer from './Components/Includes/Footer';
import Nav from './Components/Includes/Nav';
import { Route, Routes } from 'react-router-dom';
import { useDispatch } from 'react-redux';
import { setPatientdata } from './Components/Store/Patients';
import { setNewsdata } from './Components/Store/News';
import axios from 'axios';
// import ViewPatient from './Components/ViewPatient/ViewPatient';
// import ViewNews from './Components/ViewNews/ViewNews';

const Home = lazy(() => import('./Components/Home/Home'));
const Patients = lazy(() => import('./Components/Patients/Patients'));
const News = lazy(() => import('./Components/News/News'));
const NotFound = lazy(() => import('./Components/NotFound/NotFound'));
const ViewPatient = lazy(() => import('./Components/ViewPatient/ViewPatient'));
const ViewNews = lazy(() => import('./Components/ViewNews/ViewNews'));
const Login = lazy(() => import('./Components/Account/Login/Login'));
const Register = lazy(() => import('./Components/Account/Register/Register'));
const Emailverfiy = lazy(() => import('./Components/Account/Emailverify/Emailverfiy'));

function App() {
  const [IPadress, setIPadress] = useState('http://127.0.0.1:8000');
  const dispatch = useDispatch();

  //get all data for patients and news
  useEffect(() => {

    //patients all data 
    axios({
      method: 'get',
      url: IPadress + '/api/patients/show',
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(res => {
        if (res.data.status == 200) {
          dispatch(setPatientdata(res.data.data));
        } else {
          console.log(res.data.message)
        }

      }).catch(err => {
        console.log(err);
      });


    //news all data 
    axios({
      method: 'get',
      url: IPadress + '/api/news/show',
      headers: {
        'Content-Type': 'application/json'
      }
    })
      .then(res => {
        if (res.data.status == 200) {
          dispatch(setNewsdata(res.data.data));
        } else {
          console.log(res.data.message)
        }

      }).catch(err => {
        console.log(err);
      });


  }, []);





  return (
    <div className="App">
      <Nav />
      <Suspense fallback={<div>Loading...</div>}>
        <Routes>
          <Route path='/' >
            <Route index element={<Home IPadress={IPadress} />} exact />
            <Route path='Home' element={<Home IPadress={IPadress} />} exact />
            <Route path='Patients' element={<Patients IPadress={IPadress} />} exact />
            <Route path="News" element={<News IPadress={IPadress} />} exact />
            <Route path="patients/:id" element={<ViewPatient IPadress={IPadress} />} exact />
            <Route path="news/:id" element={<ViewNews IPadress={IPadress} />} exact />
            <Route path="Login" element={<Login IPadress={IPadress} />} exact />
            <Route path="Register" element={<Register IPadress={IPadress} />} exact />
            <Route path="Register/:verification_code" element={<Emailverfiy IPadress={IPadress} />} />

            <Route path='*' element={<NotFound />} exact />
          </Route>
        </Routes>
      </Suspense>
      <Footer />
    </div>
  );
}

export default App;
