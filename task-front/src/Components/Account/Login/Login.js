import React, { useEffect, useState } from 'react';
import './Login.css';
import $ from 'jquery';
import { NavLink, Link } from 'react-router-dom';
import axios from 'axios';
import { useNavigate } from 'react-router';

function Login(props) {

    const [password, setpassword] = useState('');
    const [email, setemail] = useState('');
    const [message, setmessage] = useState('');
    const [logindata, setlogindata] = useState(null);

    const usenavigation = useNavigate();

    useEffect(() => {
        if (localStorage.getItem('userLogininfo'))
            setlogindata(JSON.parse(localStorage.getItem('userLogininfo')));
    }, []);

    const loginUser = (e) => {
        e.preventDefault();

        axios({
            method: 'post',
            url: props.IPadress + '/api/user/login',
            data: {
                'email': email,
                'password': password
            },
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => {
            if (res.data.status == 200) {
                let alertMessage = document.querySelector('.alertMessageLogin');
                alertMessage.classList.remove('d-none');
                setmessage(res.data.message);
                setTimeout(() => {
                    localStorage.setItem('userLogininfo', JSON.stringify(res.data.data));
                    window.location.reload();
                }, 2000);
            } else {
                let alertMessage = document.querySelector('.alertMessageLogin');
                alertMessage.classList.remove('d-none');
                setmessage(res.data.message);
            }
        }).catch(err => {
            let alertMessage = document.querySelector('.alertMessageLogin');
            alertMessage.classList.remove('d-none');
            setmessage(err);

        });
    }

    //logout user
    const logoutuser = () => {
        localStorage.removeItem('userLogininfo');
        setlogindata(null);
    }

    return (
        <div className='Login py-5'>
            {
                (!logindata) ?
                    <div className="login-page">

                        <div className="alertMessageLogin alert-success text-dark px-1 py-1 m-2 rounded d-none">
                            <p className='text-wrap'>{message}</p>
                        </div>

                        <div className="form">
                            <form className="login-form" onSubmit={loginUser}>
                                <input type="email" placeholder="Email" value={email} onChange={(e) => { setemail(e.target.value) }} required />
                                <input type="password" placeholder="password" value={password} onChange={(e) => { setpassword(e.target.value) }} required />
                                <span className='text-danger point'>Forgot Password?</span>
                                <button className='my-3'>login</button>
                                <p className="message">Not registered? <Link to="/Register">Create an account</Link></p>
                            </form>
                        </div>

                    </div>
                    :
                    <div>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />

                        <div className="container-lg container-fluid">

                            <div className="alert-success text-dark  py-5">
                                <p className='fa-3x'> Wellcome! {logindata.name} </p>
                                <button className='btn btn-light text-dark' onClick={logoutuser}>logout</button>
                            </div>
                        </div>
                    </div>
            }

            <br />
            <br />
            <br />
            <br />
            <br /> <br />
            <br />
            <br />
            <br />
            <br />

        </div>
    )
}

export default Login;





