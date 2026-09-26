import { useEffect, useState } from 'react';
import api from '../services/api';

export default function Home() {

    const [message, setMessage] = useState('');

    useEffect(() => {
        api.get('/hello')
            .then(response => {
                setMessage(response.data.message);
            })
            .catch(error => {
                console.error(error);
            });
    }, []);

    return (
        <div>
            <h1>ABC Technologies</h1>

            <h2>We Build Digital Products</h2>

            <p>
                {message}
            </p>
        </div>
    );
}
