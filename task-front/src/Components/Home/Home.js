import React from 'react';
import Header from './Header/Header';
import './Home.css';
import Section1 from './Section1/Section1';
import Section2 from './Section2/Section2';
import Section3 from './Section3/Section3';

function Home(props) {
    return (
        <div className='Home pt-5'>
            <Header />
            <Section1 IPadress={props.IPadress} />
            <Section3 />
            <Section2 />
        </div>
    );
}

export default Home;
