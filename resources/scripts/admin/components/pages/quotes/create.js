import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import { ApiRoute, AppRoute } from '../../../const';
import QuoteForm from '../../ui/quote-form/quote-form';

export default function QuotesCreate() {
  const navigate = useNavigate();

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios
      .post(ApiRoute.Quotes['store'], {
        quote: evt.target.quote.value,
        slug: evt.target.slug.value,
        tags: evt.target.tags.value.split(','),
      })
      .then(() => navigate(AppRoute.Quotes['index']))
      .catch((error) => console.log(error));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Мысли</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Quotes['index']}>Мысли</Link>

        <Typography color="text.primary">Добавить</Typography>
      </Breadcrumbs>

      <QuoteForm onSubmit={handleFormSubmit} />
    </>
  );
}
