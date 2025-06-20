declare namespace API {
  namespace Common {
    interface PaginatingCommonParams {
        size: number;
        page: number;
        total: string;
    }

    interface PaginatingQueryRecord<T = unknown> extends PaginatingCommonParams {
        message: string;
        data: T[];
    }

    interface QueryRecord<T = unknown> {
        message: string;
        data: T;
    }

    type CommonSearchParams = Pick<PaginatingCommonParams, 'size' | 'page'>;
  }


  namespace Auth {
    interface Token {
      token: string;
    }

    type TokenResponse = Common.QueryRecord<Token>;
  }

  namespace Contacts {
    interface Contact {
      id: number;
      name: string;
      subject: string;
      message: string;
      is_read: boolean;
      submitted_at: string;
    }

    type ContactList = Common.PaginatingQueryRecord<Contact>;
  }
}