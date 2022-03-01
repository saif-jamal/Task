import React, { useEffect, useState } from 'react';
import './Emailverfiy.css';
import { useParams, Link } from 'react-router-dom';
import axios from 'axios';

function Emailverfiy(props) {
    const { verification_code } = useParams();


    useEffect(() => {
        console.log(verification_code);
        axios({
            method: 'post',
            url: props.IPadress + '/api/user/register/verify',
            data: {
                'verification_code': verification_code,
            },
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => {
            if (res.data.status == 200) {
                let alertMessage = document.querySelector('.verifyTEXT');
                alertMessage.classList.remove('d-none');
            } else {
                console.log(res.data.message);
            }
        }).catch(err => {
            console.log(err);
        });

    }, []);


    return (
        <div className='Emailverfiy'>
            <div className="verifyTEXT d-flex justify-content-center align-items-center d-none">
                <p>Your verify email success!</p>
                <Link to='/Login' className='text-decoration-none btn btn-light text-dark'>Login</Link>
            </div>
        </div>
    );
}

export default Emailverfiy;
