import * as React from 'react';
import './CardComponet.css';
import Card from '@mui/material/Card';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Typography from '@mui/material/Typography';
import { Button, CardActionArea, CardActions } from '@mui/material';


function CardComponet(props) {
    return (
        <div className='Card'>
            <Card style={{ backgroundColor: 'rgb(40,45,50)', width: '100%' }} className="cardHeight">
                <CardActionArea>
                    <CardMedia
                        component="img"
                        height="140"
                        image={(props.data.type == 'image') ? props.data.result : 'https://s1.eestatic.com/2018/05/02/actualidad/actualidad_304233531_130193550_1706x960.jpg'}

                        alt="green iguana"
                    />
                    <CardContent>
                        <Typography gutterBottom variant="h5" component="div" className='text-white text-left'>
                            {props.data.name}
                        </Typography>
                        <Typography variant="body2" className='text-white text-left'>
                            <p>age:{props.data.age}</p>
                            <p>phone: {props.data.phone}</p>
                            <p>Gender: {props.data.gender}</p>
                        </Typography>
                    </CardContent>
                </CardActionArea>
                <CardActions>
                    <Button size="small" color="warning">
                        Share
                    </Button>
                </CardActions>
            </Card>
        </div>
    )
}

export default CardComponet
