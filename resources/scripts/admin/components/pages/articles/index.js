import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import { AppRoute } from '../../../const';
import ArticlesBoard from '../../ui/articles-board';

function ArticlesIndex() {
  return (
    <>
      <Typography component="h1" variant="h5">Статьи</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Typography color="text.primary">Статьи</Typography>
      </Breadcrumbs>

      <ArticlesBoard />
    </>
  );
}

export default ArticlesIndex;
