import * as React from 'react';
import { styled } from '@mui/material/styles';
import Card from '@mui/material/Card';
import CardHeader from '@mui/material/CardHeader';
import CardMedia from '@mui/material/CardMedia';
import CardContent from '@mui/material/CardContent';
import CardActions from '@mui/material/CardActions';
import Collapse from '@mui/material/Collapse';
import Avatar from '@mui/material/Avatar';
import IconButton from '@mui/material/IconButton';
import Typography from '@mui/material/Typography';
import { green, red } from '@mui/material/colors';
import FavoriteIcon from '@mui/icons-material/Favorite';
import ShareIcon from '@mui/icons-material/Share';
import ExpandMoreIcon from '@mui/icons-material/ExpandMore';
import MoreVertIcon from '@mui/icons-material/MoreVert';
import { Link } from 'react-router-dom';

import './CardComponet.css';

const ExpandMore = styled((props) => {
    const { expand, ...other } = props;
    return <IconButton {...other} />;
})(({ theme, expand }) => ({
    transform: !expand ? 'rotate(0deg)' : 'rotate(180deg)',
    marginLeft: 'auto',
    transition: theme.transitions.create('transform', {
        duration: theme.transitions.duration.shortest,
    }),
}));



function CardCompontent2(props) {

    const [expanded, setExpanded] = React.useState(false);

    const handleExpandClick = () => {
        setExpanded(!expanded);
    };


    return (
        <div className='CardCompontent2' className='text-white'>
            <Card style={{ width: '100%', backgroundColor: 'rgb(40,45,50)' }}>
                <CardHeader
                    avatar={
                        <Avatar sx={{ bgcolor: green[500] }} aria-label="recipe">
                            S
                        </Avatar>
                    }
                    action={
                        <IconButton aria-label="settings">
                            <MoreVertIcon />
                        </IconButton>
                    }
                    title="saif jamal"
                    subheader="february 26, 2022"
                    sx={{ bgcolor: red[400] }}
                />
                <Link className='text-decoration-none' to={'/news/' + props.data.id}>
                    <CardMedia
                        component="img"
                        height="194"
                        image={props.data.image}
                        alt="Paella dish"
                        className='point'
                    />
                </Link>

                <CardContent>
                    <Link className='text-decoration-none' to={'/news/' + props.data.id}>
                        <Typography variant="body2" className='text-white point'>
                            {props.data.newsHeadline}
                        </Typography>
                    </Link>
                </CardContent>
                <CardActions disableSpacing>
                    <IconButton aria-label="add to favorites" sx={{ bgcolor: red[300] }}>
                        <FavoriteIcon />
                    </IconButton>
                    <IconButton aria-label="share" sx={{ bgcolor: green[300] }}>
                        <ShareIcon />
                    </IconButton>
                    <ExpandMore
                        expand={expanded}
                        onClick={handleExpandClick}
                        aria-expanded={expanded}
                        aria-label="show more"
                        sx={{ bgcolor: red[500] }}
                    >
                        <ExpandMoreIcon />
                    </ExpandMore>
                </CardActions>
                <Collapse in={expanded} timeout="auto" unmountOnExit>
                    <CardContent>
                        <Typography paragraph className='text-white'>Method:</Typography>
                        <Typography paragraph className='text-white wrap_text'>
                            {props.data.content}
                        </Typography>


                    </CardContent>
                </Collapse>
            </Card>
        </div>
    );
}

export default CardCompontent2;




