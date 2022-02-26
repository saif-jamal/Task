import * as React from 'react';
import './Section1.css';
import Card from '@mui/material/Card';
// import CardActions from '@mui/material/CardActions';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
// import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import { CardActionArea } from '@mui/material';
// import Box from '@mui/material/Box';
// import Paper from '@mui/material/Paper';
// import Grid from '@mui/material/Grid';
import { useSelector, useDispatch } from 'react-redux';
import { useNavigate, Link } from 'react-router-dom';
import axios from 'axios';
import { setOnepatient } from '../../Store/Patients';

function Section1(props) {
    const patients = useSelector((state) => state.patients.values);
    // const usenavigate = useNavigate();
    const usedispatch = useDispatch();

    // const gotopatient = (id) => {
    //     axios({
    //         method: 'post',
    //         url: props.IPadress + '/api/patients/showOne',
    //         data: {
    //             'id': parseInt(id)
    //         },
    //         headers: {
    //             'Content-Type': 'application/json'
    //         }
    //     }).then(res => {
    //         if (res.data.status == 200) {
    //             usedispatch(setOnepatient(res.data.data));
    //             console.log(res.data.data);
    //             usenavigate('patients/show');
    //         } else {
    //             console.log(res.data.message)
    //         }
    //     }).catch(err => {
    //         console.log(err)
    //     });
    // }

    return (
        <div className='Section1 zoomOut'>
            <div className="container-lg container-fluid">
                <div className="row ">
                    <div className="col-md-12 d-flex">
                        <p className='fa-2x text-decoration-underline text-uppercase'>Patients Analytics</p>
                    </div>

                    {
                        (patients.length > 0) ?
                            patients.slice(0, 8).map(data => (
                                <div className="col-6 col-md-3 my-3">
                                    <Link className='text-decoration-none' to={'/patients/' + data.id}>
                                        <Card style={{ backgroundColor: 'rgb(40,45,50)', width: '100%' }} >
                                            <CardActionArea>
                                                <CardMedia
                                                    component="img"
                                                    height="140"

                                                    image={(data.type == 'image') ? data.result : 'https://s1.eestatic.com/2018/05/02/actualidad/actualidad_304233531_130193550_1706x960.jpg'}
                                                    alt="green iguana"
                                                />
                                                <CardContent>
                                                    <Typography gutterBottom variant="h5" component="div" className='text-white text-left'>
                                                        {data.name}
                                                    </Typography>
                                                    <Typography variant="body2" className='text-white text-left'>
                                                        <p>age:{data.age}</p>
                                                        <p>phone: {data.phone}</p>
                                                        <p>Gender: {data.gender}</p>
                                                    </Typography>
                                                </CardContent>
                                            </CardActionArea>
                                        </Card>
                                    </Link>
                                </div>

                            ))
                            :
                            <p>No data</p>
                    }


                    <div className="col-md-12 my-4">
                        <Link to='/Patients'>
                            <button className='btn btn-dark text-white'> See More</button>
                        </Link>
                    </div>

                </div>
            </div>
        </div>
    );
}

export default Section1;
