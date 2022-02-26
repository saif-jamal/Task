import React, { useEffect, useState } from 'react';
import './ViewNews.css';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import { useSelector } from 'react-redux';


function ViewNews(props) {
    const { id } = useParams();
    const [datanews, setnewsdata_now] = useState({});
    // const datapatient = useSelector((state) => state.patients.onepatient);

    useEffect(() => {
        axios({
            method: 'post',
            url: props.IPadress + '/api/news/showOne',
            data: {
                'id': parseInt(id)
            },
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => {
            if (res.data.status == 200) {
                // usedispatch(setOnepatient(res.data.data));
                setnewsdata_now(res.data.data);
                console.log(res.data.data);
                // usenavigate('patients/show');
            } else {
                console.log(res.data.message)
            }
        }).catch(err => {
            console.log(err)
        });

    }, []);


    return (
        <div className='ViewNews'>
            <div className="container-lg container-fluid pt-5">
                {
                    datanews ?
                        <div className="row pt-5">
                            <div className="col-12 col-md-6">
                                <a href={datanews.image} target="_blank">
                                    <img src={datanews.image} alt="" className='imagePatient' />
                                </a>
                            </div>
                            <div className="col-12 col-md-6  text-left pt-lg-5 textshow">
                                <p>HeadLine: {datanews.newsHeadline}</p>
                                <p >Content: {datanews.content}</p>
                                <p>created at: {datanews.created_at}</p>
                            </div>
                        </div>
                        :
                        <p>Not Found Pationt</p>
                }

            </div>
        </div>
    );
}

export default ViewNews;
