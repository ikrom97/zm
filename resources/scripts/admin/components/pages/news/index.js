import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import { AppRoute } from '../../../const';
import NewsBoard from '../../ui/news-board';

function NewsIndex() {
  return (
    <>
      <Typography component="h1" variant="h5">Новости</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Typography color="text.primary">Новости</Typography>
      </Breadcrumbs>

      <NewsBoard />
    </>
  );
}

export default NewsIndex;
