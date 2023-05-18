import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import { ApiRoute, AppRoute } from '../../../const';
import Form from '../../ui/form/form';

function ArticlesCreate() {
  const navigate = useNavigate();

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios.post(ApiRoute.Articles['store'], new FormData(evt.target))
      .then(() => navigate(AppRoute.Articles['index']))
      .catch((error) => console.log(error));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Статьи</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Articles['index']}>Статьи</Link>

        <Typography color="text.primary">Добавить</Typography>
      </Breadcrumbs>

      <Form onSubmit={handleFormSubmit} />
    </>
  );
}

export default ArticlesCreate;
