import React, { useEffect, useState } from 'react';
import './Register.css';
import { NavLink, Link } from 'react-router-dom';
import axios from 'axios';

function Register(props) {
    const [name, setname] = useState('');
    const [password, setpassword] = useState('');
    const [email, setemail] = useState('');

    const sentdata = (e) => {
        e.preventDefault();

        axios({
            method: 'post',
            url: props.IPadress + '/api/user/register',
            data: {
                'name': name,
                'password': password,
                'email': email,
                'url': window.location.origin
            },
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => {
            if (res.data.status == 200) {
                let alertMessage = document.querySelector('.alertMessage');
                alertMessage.classList.remove('d-none');
            } else {
                console.log(res.data.message);
            }
        }).catch(err => {
            console.log(err);
        });

    }


    return (
        <div className='Register'>
            <div className="login-page">

                <div className="alertMessage alert-success text-dark px-1 py-1 m-2 rounded d-none">
                    <p className='text-wrap'>create account success.Please check your email to verify your account.</p>
                </div>

                <div className="form">

                    <form className="register-form" onSubmit={sentdata}>
                        <input type="text" placeholder="name" value={name} required onChange={(e) => { setname(e.target.value) }} />
                        <input type="password" placeholder="password" value={password} onChange={(e) => { setpassword(e.target.value) }} required />
                        <input type="email" placeholder="email address" value={email} onChange={(e) => { setemail(e.target.value) }} required />
                        <button>create</button>
                        <p className="message">Already registered? <Link to="/Login">Login</Link></p>
                    </form>

                </div>
            </div>
        </div>
    )
}

export default Register
