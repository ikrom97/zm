import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router-dom';
import Form from '../../ui/form/form';
import { ApiRoute, AppRoute } from '../../../const';
import { toast } from 'react-toastify';

function ArticlesEdit() {
  const [article, setArticle] = useState(null);
  const params = useParams();

  useEffect(() => {
    axios.get(generatePath(ApiRoute.Articles['show'], { id: params.id }))
      .then(({ data }) => setArticle(data))
      .catch((error) => console.log(error));
  }, []);

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios.post(
      generatePath(ApiRoute.Articles['update'], { id: article.id }),
      new FormData(evt.target)
    )
      .then(() => toast.success('Статья успешно сохранена'))
      .catch((error) => console.log(error));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Статьи</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Articles['index']}>Статьи</Link>

        <Typography color="text.primary">Редактировать</Typography>
      </Breadcrumbs>

      {article && <Form onSubmit={handleFormSubmit} data={article} />}
    </>
  );
}

export default ArticlesEdit;
