import React, { useEffect, useState } from 'react';
import './ViewPatient.css';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import { useSelector } from 'react-redux';

function ViewPatient(props) {
    const { id } = useParams();
    const [datapatient, setpatientdata_now] = useState({});
    // const datapatient = useSelector((state) => state.patients.onepatient);

    useEffect(() => {
        axios({
            method: 'post',
            url: props.IPadress + '/api/patients/showOne',
            data: {
                'id': parseInt(id)
            },
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => {
            if (res.data.status == 200) {
                // usedispatch(setOnepatient(res.data.data));
                setpatientdata_now(res.data.data);
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
        <div className='ViewPatient pt-5'>
            <div className="container-lg container-fluid pt-5">
                {
                    datapatient ?
                        <div className="row pt-5">
                            <div className="col-12 col-md-6">
                                <a href={datapatient.result} target="_blank">
                                    <img src={(datapatient.type == 'image') ? datapatient.result : 'https://s1.eestatic.com/2018/05/02/actualidad/actualidad_304233531_130193550_1706x960.jpg'} alt="" className='imagePatient' />
                                </a>
                            </div>
                            <div className="col-12 col-md-6 text-left pt-lg-5 textshow">
                                <p>Name: {datapatient.name}</p>
                                <p>Age: {datapatient.age}</p>
                                <p>phone: {datapatient.phone}</p>
                                <p>gender: {datapatient.gender}</p>
                            </div>
                        </div>
                        :
                        <p>Not Found Pationt</p>
                }

            </div>
        </div>
    );
}

export default ViewPatient;
