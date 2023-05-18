import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router-dom';
import Form from '../../ui/form/form';
import { ApiRoute, AppRoute } from '../../../const';
import { toast } from 'react-toastify';

function NewsEdit() {
  const [news, setNews] = useState(null);
  const params = useParams();

  useEffect(() => {
    axios.get(generatePath(ApiRoute.News['show'], { id: params.id }))
      .then(({ data }) => setNews(data))
      .catch((error) => console.log(error));
  }, []);

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios.post(
      generatePath(ApiRoute.News['update'], { id: news.id }),
      new FormData(evt.target)
    )
      .then(() => toast.success('Новость успешно сохранена'))
      .catch((error) => console.log(error));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Новости</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.News['index']}>Новости</Link>

        <Typography color="text.primary">Редактировать</Typography>
      </Breadcrumbs>

      {news && <Form onSubmit={handleFormSubmit} data={news} />}
    </>
  );
}

export default NewsEdit;
